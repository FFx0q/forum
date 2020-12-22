import React, { useState } from "react";
import { Redirect } from "react-router-dom";
import { useAuth } from "../../context/auth";
import config from "../../config.json";

export const LoginForm = () => {
  const [isLoggedIn, setLoggedIn] = useState(false);
  const [isError, setIsError] = useState(false);
  const [login, setLogin] = useState("");
  const [password, setPassword] = useState("");
  const { setAuthToken } = useAuth();
  const request = {
    method: "POST",
    body: JSON.stringify({ login, password }),
  };

  const postLogin = async () => {
    const data = await fetch(`${config.api_url}/auth`, request).catch((e) =>
      setIsError(true)
    );
    const json = await data.json();

    if (json.statusCode === 200) {
      setAuthToken(json.data);
      setLoggedIn(true);
    } else {
      setIsError(true);
    }
  };

  if (isLoggedIn) {
    return <Redirect to="/" />;
  }

  return (
    <form onSubmit={(e) => e.preventDefault()}>
      <div style={({ display: "flex" }, { flexDirection: "column" })}>
        <input
          required
          type={"text"}
          name={"login"}
          placeholder={"login"}
          value={login}
          onChange={(e) => setLogin(e.target.value)}
        />
        <input
          required
          type={"password"}
          name={"password"}
          placeholder={"password"}
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />

        <button type="submit" onClick={postLogin}>
          Login
        </button>
        {isError && (
          <span>The username or password provided were incorrect!</span>
        )}
      </div>
    </form>
  );
};
