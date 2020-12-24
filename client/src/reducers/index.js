import { combineReducers } from "redux";
import { connectRouter } from "connected-react-router";
import posts from "./posts";
import auth from "./auth";
import user from "./user";

const rootReducer = (history) =>
  combineReducers({
    auth,
    user,
    posts,
    router: connectRouter(history),
  });

export default rootReducer;
