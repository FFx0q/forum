import { applyMiddleware, compose, createStore } from "redux";
import { routerMiddleware } from "connected-react-router";
import { createBrowserHistory } from "history";
import RootReducer from "./reducers";
import thunk from "redux-thunk";

export const history = createBrowserHistory();

export default (preloadedState) => {
  return createStore(
    RootReducer(history),
    preloadedState,
    compose(applyMiddleware(routerMiddleware(history), thunk))
  );
};
