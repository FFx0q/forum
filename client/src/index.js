import React from "react";
import ReactDOM from "react-dom";

import App from "./components/app";
import "../style/index.scss";

import { Provider } from "react-redux";
import createStore from "./store";

const store = createStore();

ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.querySelector("#root")
);

module.hot.accept();
