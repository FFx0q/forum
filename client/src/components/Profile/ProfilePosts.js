import React from "react";
import { Link } from "react-router-dom";

export const ProfilePosts = (data) => {
  const { posts } = data;

  return (
    <>
      {posts.map((post) => (
        <article key={post.id} className={"post"}>
          <Link className={"profile"} to={`/${data.login}`}>
            <img
              className={"avatarSmall"}
              src={
                "https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
              }
              alt={post.author.login}
            />
          </Link>
          <div>
            <div className={"author"}>
              <Link className={"name"} to={`/${data.login}`}>
                {data.login}
              </Link>
              <span className={"date"}>{post.createdAt}</span>
            </div>
            <div className={"text"}>
              <p>{post.body}</p>
            </div>
          </div>
        </article>
      ))}
    </>
  );
};
