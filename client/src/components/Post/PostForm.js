import React, { useState } from "react";
import config from "../../config.json";
import { Link, Redirect } from "react-router-dom";

export const PostForm = () => {
  const { login, token } = JSON.parse(localStorage.getItem("user"));
  const [body, setBody] = useState("");
  const [isError, setIsError] = useState(false);

  const post = (e) => {
    if (body.length === 0 || body.length >= 280) {
      setIsError(true);
      return;
    }
    fetch(`${config.api_url}/posts`, {
      method: "POST",
      headers: {
        Authorization: `Bearer ${token}`,
      },
      body: JSON.stringify({
        body,
        author: JSON.parse(localStorage.getItem("user"))["uid"],
      }),
    }).catch((e) => setIsError(true));
  };

  return (
    <form onSubmit={post}>
      <div>
        <Link
          className={"profile"}
          to={`/${login}`}
          style={{ marginRight: "15px" }}
        >
          <img
            className={"avatarSmall"}
            src={
              "https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
            }
            alt={login}
          />
        </Link>
        <textarea
          name={"body"}
          value={body}
          placeholder={"Post something.."}
          onChange={(e) => setBody(e.target.value)}
        />
        <input type={"submit"} value={"Post"} />
      </div>
      {isError && <span>Failed to add post!</span>}
    </form>
  );
};
