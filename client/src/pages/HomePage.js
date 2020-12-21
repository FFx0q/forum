import React from "react";
import { PostListContainer } from "../components/Post";
import { MainMenu } from "../components/Layout";

export const HomePage = () => {
  return (
    <>
      <MainMenu />
      <PostListContainer />
    </>
  );
};
