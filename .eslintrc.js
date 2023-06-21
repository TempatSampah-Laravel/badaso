module.exports = {
  env: {
    es6: true,
    node: true,
    browser: true,
  },
  extends: [
    "plugin:vue/essential",
    "standard",
    "eslint:recommended",
    "plugin:prettier/recommended",
    "plugin:vue/strongly-recommended",
    "plugin:vue/base",
    "plugin:vue/recommended",
    "prettier",
  ],
  parser: "babel-eslint",
  parserOptions: {
    ecmaVersion: 2018,
    sourceType: "module",
    allowImportExportEverywhere: true,
    ecmaFeatures: {
      jsx: true,
      modules: true,
    },
  },
  plugins: ["vue", "flowtype", "prettier"],
  globals: {
    __WEEX__: true,
    WXEnvironment: true,
  },
  rules: {
    "no-console": import.meta.env.NODE_ENV !== "production" ? 0 : 2,
    "no-useless-escape": 0,
    "no-empty": 0,
    "vue/no-mutating-props": "off",
    "no-prototype-builtins": "off",
    "prettier/prettier": "error",
    eqeqeq: "off",
  },
};
