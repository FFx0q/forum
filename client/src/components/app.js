import React, { Suspense } from "react";
import { Switch } from "react-router";
import { ConnectedRouter } from "connected-react-router";
import { PrivateRoute } from "./private";
import { history } from "../store";
import { Loader } from "./Layout";

const PostsContainer = React.lazy(() => import("../container/PostsContainer"));
const ProfileContainer = React.lazy(() =>
  import("../container/ProfileContainer")
);

class App extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="container">
        <Suspense fallback={Loader}>
          <ConnectedRouter history={history}>
            <Switch>
              <PrivateRoute exact path="/" component={PostsContainer} />
              <PrivateRoute exact path="/:login" component={ProfileContainer} />
            </Switch>
          </ConnectedRouter>
        </Suspense>
      </div>
    );
  }
}

export default App;
