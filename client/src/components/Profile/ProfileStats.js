import React from "react";

const ProfileStats = (stats) => (
  <>
    <span>
      Posts:
      <span>{stats.posts}</span>
    </span>
    <span>
      Followers:
      <span>{stats.followers}</span>
    </span>
    <span>
      Following:
      <span>{stats.following}</span>
    </span>
  </>
);

export default ProfileStats;
