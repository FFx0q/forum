import React, { useState } from "react";
import { BrowserRouter } from "react-router-dom";
import { AuthContext } from "./context/auth";
import { PrivateRoute } from "./PrivateRoute";
import { HomePage, ProfilePage } from "./pages";

export const App = () => {
  const existsToken = JSON.parse(localStorage.getItem("user"));
  const [authToken, setAuthToken] = useState(existsToken);
  
  const setToken = (data) => {
    localStorage.setItem("user", JSON.stringify(data));
    setAuthToken(data);
  };
  
  return (
    <AuthContext.Provider value={{ authToken, setAuthToken: setToken }}>
      <BrowserRouter>
        <div className={"container"}>
          <PrivateRoute exact path={"/"} component={HomePage} />
          <PrivateRoute exact path={"/:login"} component={ProfilePage} />
        </div>
      </BrowserRouter>
    </AuthContext.Provider>
  );
};
