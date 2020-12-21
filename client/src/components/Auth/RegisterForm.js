import React, { useState } from "react";
import config from "../../config.json";

export const RegisterForm = () => {
  const [isError, setIsError] = useState(false);
  const [login, setLogin] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const request = {
    method: "POST",
    body: JSON.stringify({ login, email, password }),
  };

  const register = async () => {
    await fetch(`${config.api_url}/users`, request).catch((e) =>
      setIsError(true)
    );
  };

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
          type={"email"}
          name={"email"}
          placeholder={"email"}
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
        <input
          required
          type={"password"}
          name={"password"}
          placeholder={"password"}
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />

        <button type="submit" onClick={register}>
          Register
        </button>
        {isError && <span>Error</span>}
      </div>
    </form>
  );
};
