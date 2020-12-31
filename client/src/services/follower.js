import { authHeader } from "../helpers";

export const add = (data) => {
  const headers = {
    method: "POST",
    headers: authHeader(),
    body: JSON.stringify(data),
  };

  return fetch("http://localhost:8080/api/v1/followers", headers)
    .then((res) => res.json())
    .then((res) => res.data);
};

export const remove = (data) => {
  const headers = {
    method: "DELETE",
    headers: authHeader(),
  };

  return fetch(
    `http://localhost:8080/api/v1/followers/${data.uid}/${data.fid}`,
    headers
  )
    .then((res) => res.json())
    .then((res) => res.data);
};
