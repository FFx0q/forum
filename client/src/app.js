import React, { useState } from "react";
import { ThemeProvider, CssBaseline } from "@material-ui/core";
import { BrowserRouter } from "react-router-dom";
import theme from "./theme";
import { AuthContext } from "./context/auth";
import PrivateRoute from "./PrivateRoutes";
import { HomePage } from "./pages";

export default () => {
  const existsToken = JSON.parse(localStorage.getItem("user"));
  const [authToken, setAuthToken] = useState(existsToken);
  const setToken = (data) => {
    localStorage.setItem("user", JSON.stringify(data));
    setAuthToken(data);
  };

  return (
    <AuthContext.Provider value={{ authToken, setAuthToken: setToken }}>
      <BrowserRouter>
        <ThemeProvider theme={theme}>
          <CssBaseline />
          <PrivateRoute path={"/"} component={HomePage} />
        </ThemeProvider>
      </BrowserRouter>
    </AuthContext.Provider>
  );
};
