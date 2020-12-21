import React from "react";
import { useParams } from "react-router-dom";
import { ProfilePosts } from "./ProfilePosts";
import { Loader } from "../Layout";
import { useRequest } from "../../hooks";

export const ProfileContainer = () => {
  const { login } = useParams();
  const { data, loading, error } = useRequest(`/users/${login}`);

  if (loading || !data) {
    return <Loader />;
  }

  if (error) {
    return <span>{error.message}</span>;
  }

  return (
    <div className={"mainSection"}>
      <div className={"profileHeader"}>
        <img
          className={"avatarBig"}
          src={
            "https://www.alliancerehabmed.com/wp-content/uploads/icon-avatar-default.png"
          }
          alt={data.data.login}
        />
        <div>
          <div className={"info"}>
            <h1>{data.data.login}</h1>
            <div className={"stats"}>
              <span>
                Posts: <span>{data.data.posts.length}</span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <ProfilePosts {...data.data} />
    </div>
  );
};
