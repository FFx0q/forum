import React from 'react'
import {
    Avatar, List, ListItem, Card, CardHeader, CardContent, Typography
} from '@material-ui/core'

export default ({ posts }) => (
    <List>
        {posts?.map(post => (
            <ListItem key={post.id}>
                <Card style={{width: 1200}}>
                    <CardHeader
                        avatar={
                            <Avatar src={''} />
                        }
                        title={post.author.login}
                        subheader={post.createdAt}
                    />
                    <CardContent>
                        <Typography variant="body2" color="textSecondary" component="p">
                            {post.content}
                        </Typography>
                    </CardContent>
                </Card>
            </ListItem>
        ))}
    </List>
)