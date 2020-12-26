import { applyMiddleware, compose, createStore } from "redux";
import { routerMiddleware } from "connected-react-router";
import { createBrowserHistory } from "history";
import thunk from "redux-thunk";
import RootReducer from "./reducers";

export const history = createBrowserHistory();

export default (preloadedState) =>
  createStore(
    RootReducer(history),
    preloadedState,
    compose(applyMiddleware(routerMiddleware(history), thunk))
  );
