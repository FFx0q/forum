import React from 'react'
import {Route} from 'react-router-dom'
import { useAuth } from './context/auth'
import AuthPage from "./pages/AuthPage";

export default ({ component: Component, ...rest}) => {
    const { authToken } = useAuth()

    return(
        <Route {...rest} render={(props) =>
            authToken ? (
                <Component {...props} />
            ) : (
                <AuthPage />
            )
        }
        />
    );
}