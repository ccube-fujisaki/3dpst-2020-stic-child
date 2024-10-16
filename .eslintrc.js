// module.exports = {
// 	extends: [ 'plugin:@wordpress/eslint-plugin/recommended' ],
// 	rules: {
// 		'no-console': 'warn',
// 	},
// };

module.exports = {
  env: {
    browser: true,
    es2021: true,
    node: true,
  },
  extends: ['eslint:recommended', 'plugin:react/recommended', 'plugin:react/jsx-runtime'],
  parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module',
  },
  rules: {
    'react/prop-types': 'off', // ルールはお好みで
    'no-unused-vars': 'warn',
  },
};
