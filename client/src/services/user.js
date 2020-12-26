import { authHeader } from "../helpers";

export const login = (userInfo) => {
  const headers = {
    method: "POST",
    body: JSON.stringify(userInfo),
  };

  return fetch("http://localhost:8080/api/v1/auth", headers)
    .then((res) => res.json())
    .then((res) => {
      if (res.statusCode !== 200) {
        return {};
      }

      localStorage.setItem("user", JSON.stringify(res.data));
      return res.data;
    });
};
