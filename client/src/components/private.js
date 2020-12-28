import React from "react";
import { Route } from "react-router";
import LoginContainer from "../container/AuthContainer";

export default ({ component: Component, ...rest }) => (
  <Route
    {...rest}
    render={(props) =>
      localStorage.getItem("user") ? (
        <Component {...props} />
      ) : (
        <LoginContainer />
      )
    }
  />
);
