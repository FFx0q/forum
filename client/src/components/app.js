import React from "react";
import { Switch } from "react-router";
import { ConnectedRouter } from "connected-react-router";
import { PrivateRoute } from "./private";
import { history } from "../store";

import PostsContainer from "../container/PostsContainer";
import ProfileContainer from "../container/ProfileContainer";

class App extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className={"container"}>
        <ConnectedRouter history={history}>
          <Switch>
            <PrivateRoute exact path={"/"} component={PostsContainer} />
            <PrivateRoute exact path={"/:login" } component={ProfileContainer} />
          </Switch>
        </ConnectedRouter>
      </div>
    );
  }
}

export default App;
