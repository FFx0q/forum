import React from "react";
import { connect } from "react-redux";
import { authActions } from "../../actions";
import { push } from "connected-react-router";

class Login extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      login: "",
      password: "",
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  handleSubmit(e) {
    e.preventDefault();
    const { login, password } = this.state;

    if (login && password) {
      this.props.dispatch(authActions.login({ login, password }));
      this.props.dispatch(push("/"));
    }
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <div style={({ display: "flex" }, { flexDirection: "column" })}>
          <input
            required
            type={"text"}
            name={"login"}
            placeholder={"login"}
            value={this.state.login}
            onChange={this.handleChange}
          />
          <input
            required
            type={"password"}
            name={"password"}
            placeholder={"password"}
            value={this.state.password}
            onChange={this.handleChange}
          />

          <input type={"submit"} value={"login"} />
        </div>
      </form>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    user: state.auth.user,
    loggedIn: state.auth.loggedIn,
  };
};

export default connect(mapStateToProps)(Login);
