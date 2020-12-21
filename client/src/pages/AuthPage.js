import React from "react";
import { LoginForm, RegisterForm } from "../components/Auth";

export const AuthPage = () => {
  return (
    <div className={"grid"}>
      <div className={"column"}>
        <h2>Already have an account?</h2>
        <LoginForm />
      </div>
      <div className={"column"}>
        <h2>Create an account</h2>
        <RegisterForm />
      </div>
    </div>
  );
};
