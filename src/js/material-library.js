import Vue from 'vue';

new Vue( {
	el: '#material-library',
	data: {
		items: [],
		rawValues: {},
		defaults: {
			mp: '180',
			mf: [],
			mc: '',
			// 'material-material': '',
			mu: '',
		},
		conditions: [],
		queries: {
			per_page: 50,
			order: 'asc',
			orderby: 'title',
		},
		names: [],
	},

	computed: {
		values() {
			this.rawValues.mf =
				typeof this.rawValues.mf === 'string'
					? this.rawValues.mf.split( ',' )
					: this.rawValues.mf;
			return this.rawValues;
		},

		termNames() {
			let labels = [];

			Object.keys( this.values ).forEach( ( key ) => {
				const trueKey = key === 'mf' ? 'material-features' : key;

				if ( Array.isArray( this.values[ key ] ) ) {
					this.values[ key ].forEach( ( k ) => {
						const url =
							window.location.protocol +
							'//' +
							window.location.host +
							'/wp-json/wp/v2/' +
							trueKey +
							'/' +
							k;
						fetch( url )
							.then( ( response ) => response.json() )
							.then( ( data ) => {
								if ( data.name ) {
									labels.push( {
										key,
										value: k,
										label: data.name,
									} );
								}
							} );
					} );
				} else {
					const url =
						window.location.protocol +
						'//' +
						window.location.host +
						'/wp-json/wp/v2/' +
						trueKey +
						'/' +
						this.values[ key ];
					fetch( url )
						.then( ( response ) => response.json() )
						.then( ( data ) => {
							if ( data.name ) {
								labels.push( {
									key,
									value: this.values[ key ],
									label: data.name,
								} );
							}
						} );
				}
			} );

			const compare = ( a, b ) => {
				return a.key > b.key ? 1 : -1;
			};

			labels = labels.sort( compare );
			return labels;
		},

		sortedTermNames() {
			if ( Array.isArray( this.termNames ) ) {
				const compare = ( a, b ) => {
					return a.key > b.key ? -1 : 1;
				};
				return this.termNames.sort( compare );
			}
		},

		sortedValues() {
			const sorted = Object.fromEntries(
				Object.entries( this.values ).map( ( [ key, val ] ) => [
					key,
					Array.isArray( val )
						? val.sort( ( a, b ) => {
								return Number( a ) < Number( b ) ? -1 : 1;
						  } )
						: val,
				] )
			);
			return sorted;
		},

		stringifiedQuery() {
			// const obj = this.sortedValues;
			const stringified = new URLSearchParams(
				this.sortedValues
			).toString();
			return '?' + stringified;
		},
	},

	watch: {
		stringifiedQuery( newVal, oldVal ) {
			const location = window.location;
			let url = location.href.replace( location.search, newVal );
			url = location.pathname + newVal + location.hash;

			if ( location.search !== newVal ) {
				history.replaceState( null, null, url );
			}
			this.ajax( 'material?_embed' );
		},
	},

	methods: {
		ajax( path ) {
			this.loading();

			const self = this;
			const param = Object.assign( this.queries, this.values );
			for ( const key in param ) {
				if ( param[ key ] == '' ) {
					delete param[ key ];
				}
			}

			const query = new URLSearchParams( param );
			const urlString =
				window.location.protocol +
				'//' +
				window.location.host +
				'/wp-json/wp/v2/' +
				path;
			const url = new URL( urlString );
			url.search += '&' + query.toString();

			fetch( url.href )
				.then( ( response ) => response.json() )
				.then( ( data ) => {
					self.items = data;
					self.loaded();
				} );
		},

		// GETパラメータを配列に
		queryToArray() {
			let queries = [
				...new URLSearchParams( window.location.search ).entries(),
			].reduce( ( obj, e ) => ( { ...obj, [ e[ 0 ] ]: e[ 1 ] } ), {} );

			if (
				typeof queries.mf !== 'undefined' &&
				queries.mf.length === 0
			) {
				queries.mf = [];
			}
			queries = Object.assign( this.defaults, queries );
			// queries = Object.fromEntries(
			//   Object.entries(queries)
			//     .map(([key, val]) => [key, val])
			// )
			return queries;
		},

		setQueriesToValues() {
			this.rawValues = this.queryToArray();
		},

		loading() {
			const $loading = document.querySelector(
				'.p-material-library__loading'
			);
			$loading.style.display = 'flex';
		},

		loaded() {
			const $loading = document.querySelector(
				'.p-material-library__loading'
			);
			$loading.style.display = 'none';
		},

		removeTerm( key, val ) {
			if ( key != 'mf' ) {
				this.values[ key ] = '';
			}
		},
	},

	created() {
		if ( this.queryToArray() ) {
			this.setQueriesToValues();
		}
	},
} );
