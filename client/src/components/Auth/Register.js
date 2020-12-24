import React from "react";
import { connect } from "react-redux";
import { userActions } from "../../actions";

class Register extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      login: "",
      password: "",
      email: "",
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  handleSubmit(e) {
    e.preventDefault();
    const { login, password, email } = this.state;

    if (login && password && email) {
      this.props.dispatch(userActions.saveUser(this.state));
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
            type={"email"}
            name={"email"}
            placeholder={"email"}
            value={this.state.email}
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

          <input type={"submit"} value={"Register"} />
        </div>
      </form>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    user: state.user,
  };
};

export default connect(mapStateToProps)(Register);
