import React from "react";
import Spinner from "react-loader-spinner";

const Loader = () => (
  <div className="loader">
    <Spinner type="ThreeDots" color="#DDD" height={40} width={40} />
  </div>
);

export default Loader;
