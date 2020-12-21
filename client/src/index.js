import "regenerator-runtime/runtime";
import React from "react";
import { render } from "react-dom";
import { App } from "./app";
import "./theme/index.scss";

render(<App />, document.querySelector("#root"));
