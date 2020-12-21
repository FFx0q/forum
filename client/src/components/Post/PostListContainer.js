import React from "react";
import { PostList } from "./PostList";
import { useRequest } from "../../hooks";

export const PostListContainer = () => {
  const { data, loading, error } = useRequest(`/posts`);

  if (loading || !data) {
    return <h1>Loading...</h1>;
  }

  if (error) {
    return <span>{error.message}</span>;
  }

  return <PostList {...data} />;
};
