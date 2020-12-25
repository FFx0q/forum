import { authHeader } from "../helpers";

export const add = (post) => {
  const headers = {
    method: "POST",
    headers: authHeader(),
    body: JSON.stringify(post),
  };

  return fetch("http://localhost:8080/api/v1/posts", headers)
    .then((res) => res.json())
    .then((res) => res.data);
};

export const gellAll = () => {
  const headers = {
    method: "GET",
    headers: authHeader(),
  };

  return fetch("http://localhost:8080/api/v1/posts", headers)
    .then((res) => res.json())
    .then((res) => res.data);
};
