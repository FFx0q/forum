import React from "react";
import { Link } from "react-router-dom";
import { HomeRounded, PersonRounded } from "@material-ui/icons";

export const MainMenu = () => {
  const { login } = JSON.parse(localStorage.getItem("user"));

  return (
    <nav className={"mainMenu"}>
      <div className={"logo"}>
        <h2>Society</h2>
      </div>
      <Link to={"/"}>
        <HomeRounded fontSize={"large"} />
        <span>Home</span>
      </Link>
      <Link to={`/${login}`}>
        <PersonRounded fontSize={"large"} />
        <span>Profile</span>
      </Link>
    </nav>
  );
};
