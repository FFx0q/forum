import React, { useState, useEffect } from "react";
import config from "../config.json";

const useRequest = (url) => {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  useEffect(() => {
    let ignore = false;
    const fetchData = async () => {
      setLoading(true);

      const data = await fetch(`${config.api_url}${url}`);
      const json = await data.json();

      if (!ignore) setData(json);
      setLoading(false);
    };
    fetchData().catch((e) => setError(e));
    return () => {
      ignore = true;
    };
  }, [url]);

  return { data, loading, error };
};

export default useRequest;
