import React from "react";
import { Link } from "react-router-dom";
import { PostForm } from "./PostForm";

export const PostList = (posts) => (
  <section className={"mainSection"}>
    <PostForm />
    {posts.data.map((post) => (
      <article key={post.id} className={"post"}>
        <Link className={"profile"} to={`/${post.author.login}`}>
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
            <Link className={"name"} to={`/${post.author.login}`}>
              {post.author.login}
            </Link>
            <span className={"date"}>{post.createdAt}</span>
          </div>
          <div className={"text"}>
            <p>{post.content}</p>
          </div>
        </div>
      </article>
    ))}
  </section>
);
