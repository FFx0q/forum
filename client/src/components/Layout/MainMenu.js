import React from "react";
import { Link } from "react-router-dom";
import { HomeRounded, PersonRounded } from "@material-ui/icons";

class MainMenu extends React.Component {
  constructor(props) {
    super(props);
    const { login } = JSON.parse(localStorage.getItem("user"));

    this.state = {
      login,
    };
  }

  componentDidMount() {
    const { login } = JSON.parse(localStorage.getItem("user"));
    this.setState({ login });
  }

  render() {
    return (
      <nav className="mainMenu">
        <div className="logo">
          <h2>Society</h2>
        </div>
        <Link to="/">
          <HomeRounded fontSize="large" />
          <span>Home</span>
        </Link>
        <Link to={`/${this.state.login}`}>
          <PersonRounded fontSize="large" />
          <span>Profile</span>
        </Link>
      </nav>
    );
  }
}

export default MainMenu;
