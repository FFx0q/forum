import React from "react";
import { Route } from "react-router";
import LoginContainer from "../container/AuthContainer";

export const PrivateRoute = ({ component: Component, ...rest }) => {
  const user = localStorage.getItem("user");

  return (
    <Route
      {...rest}
      render={(props) => (user ? <Component {...props} /> : <LoginContainer />)}
    />
  );
};
