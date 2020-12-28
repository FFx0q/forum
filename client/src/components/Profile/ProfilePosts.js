import React from "react";
import { Link } from "react-router-dom";

const ProfilePosts = (users) => {
  const { posts } = users;

  return (
    <>
      {posts?.map((post) => (
        <article key={post.id} className="post">
          <Link className="profile" to={`/${users.login}`}>
            <img
              className="avatarSmall"
              src="https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
              alt={users.login}
            />
          </Link>
          <div>
            <div className="author">
              <Link className="name" to={`/${users.login}`}>
                {users.login}
              </Link>
              <span className="date">{post.createdAt}</span>
            </div>
            <div className="text">
              <p>{post.body}</p>
            </div>
          </div>
        </article>
      ))}
    </>
  );
};

export default ProfilePosts;
