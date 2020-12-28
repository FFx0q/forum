import React from "react";
import { Login, Register } from "../components/Auth";

const AuthContainer = () => (
  <div className="grid">
    <div className="column">
      <h2>Already have an account?</h2>
      <Login />
    </div>
    <div className="column">
      <h2>Create an account</h2>
      <Register />
    </div>
  </div>
);

export default AuthContainer;
