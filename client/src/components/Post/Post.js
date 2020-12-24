import React from "react";

export const Post = (post) => (
  <article className={"post"}>
    <a className={"profile"} href={`/${post.author.login}`}>
      <img
        className={"avatarSmall"}
        src={
          "https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
        }
        alt={post.author.login}
      />
    </a>
    <div>
      <div className={"author"}>
        <a className={"name"} href={`/${post.author.login}`}>
          {post.author.login}
        </a>
        <span className={"date"}>{post.createdAt}</span>
      </div>
      <div className={"text"}>
        <p>{post.content}</p>
      </div>
    </div>
  </article>
);

export default Post;
