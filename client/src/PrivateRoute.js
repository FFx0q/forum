import React from "react";
import { Route } from "react-router-dom";
import { useAuth } from "./context/auth";
import { AuthPage } from "./pages";

export const PrivateRoute = ({ component: Component, ...rest }) => {
  const { authToken } = useAuth();

  return (
    <Route
      {...rest}
      render={(props) => (authToken ? <Component {...props} /> : <AuthPage />)}
    />
  );
};
