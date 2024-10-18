import StandardLayout from "@/Layouts/StandardLayout";
import { useState } from "react";
import { Head, Link } from "@inertiajs/react";
import {
    Avatar,
    Box,
    Button,
    Card,
    CardActions,
    CardContent,
    CardHeader,
    CardMedia,
    Container,
    Divider,
    IconButton,
    Typography,
} from "@mui/material";
import FavoriteIcon from "@mui/icons-material/Favorite";
import ShareIcon from "@mui/icons-material/Share";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
    faComment,
    faComments,
    faHeart,
} from "@fortawesome/free-solid-svg-icons";

export default function Home({ auth, laravelVersion, phpVersion }) {
    return (
        <StandardLayout>
            <Head title="Home" />
            <Container>
                {
                    //This is dummy array. Replace it with dynamic data
                    [...Array(10)].map((e, i) => (
                        <Box key={i}>
                            <Card
                                sx={{
                                    width: "100%",
                                    bgcolor: "#343434",
                                    color: "#FFFFFF",
                                    boxShadow: "none",
                                }}
                            >
                                {/* This is dummy data. Replace it with dynamic data */}
                                <CardHeader
                                    avatar={
                                        <Avatar
                                            sx={{ bgcolor: "#FF0000" }}
                                            aria-label="recipe"
                                        >
                                            R
                                        </Avatar>
                                    }
                                    sx={{
                                        "& .MuiCardHeader-subheader": {
                                            color: "#FFFFFF",
                                        },
                                    }}
                                    title="Shrimp and Chorizo Paella"
                                    subheader="September 14, 2016"
                                />
                                <CardMedia
                                    component="img"
                                    height="194"
                                    image="/static/images/cards/paella.jpg"
                                    alt="Paella dish"
                                />
                                <CardContent>
                                    <Typography
                                        variant="body2"
                                        sx={{ color: "#FFFFFF" }}
                                    >
                                        This impressive paella is a perfect
                                        party dish and a fun meal to cook
                                        together with your guests. Add 1 cup of
                                        frozen peas along with the mussels, if
                                        you like.
                                    </Typography>
                                </CardContent>
                                <CardActions
                                    sx={{
                                        display: "flex",
                                        gap: "1em",
                                        alignItems: "center",
                                        // justifyContent: "center",
                                    }}
                                >
                                    {/* <IconButton
                                        aria-label="like"
                                        sx={{
                                            color: "#FFFFFF",
                                            display: "flex",
                                            gap: "0.5em",
                                            alignItems: "center",
                                            justifyContent: "center",
                                            bgcolor: "#003C71",
                                            borderRadius: 50,
                                            padding: "0.25em 0.5em",
                                        }}
                                    >
                                        <FontAwesomeIcon
                                            icon={faHeart}
                                            color="#FFFFFF"
                                        />
                                        <Typography>0</Typography>
                                    </IconButton> */}
                                    <Button
                                        aria-label="like"
                                        sx={{
                                            color: "#FFFFFF",
                                            bgcolor: "#003C71",
                                            borderRadius: 50,
                                        }}
                                        startIcon={
                                            <FontAwesomeIcon
                                                icon={faHeart}
                                                color="#FFFFFF"
                                            />
                                        }
                                    >
                                        <Typography>0</Typography>
                                    </Button>
                                    {/* <IconButton
                                        aria-label="comment"
                                        sx={{
                                            color: "#FFFFFF",
                                            display: "flex",
                                            gap: "0.5em",
                                            alignItems: "center",
                                            justifyContent: "center",
                                            bgcolor: "#003C71",
                                            borderRadius: 50,
                                            padding: "0.25em 0.5em",
                                        }}
                                    >
                                        <FontAwesomeIcon
                                            icon={faComment}
                                            color="#FFFFFF"
                                        />
                                        <Typography>0</Typography>
                                    </IconButton> */}
                                    <Button
                                        aria-label="comment"
                                        sx={{
                                            color: "#FFFFFF",
                                            bgcolor: "#003C71",
                                            borderRadius: 50,
                                        }}
                                        startIcon={
                                            <FontAwesomeIcon
                                                icon={faComments}
                                                color="#FFFFFF"
                                            />
                                        }
                                    >
                                        <Typography>0</Typography>
                                    </Button>
                                </CardActions>
                            </Card>
                            <Divider
                                variant="middle"
                                sx={{
                                    bgcolor: "#5B6770",
                                    width: "90%",
                                    my: "1.5em",
                                }}
                            />
                        </Box>
                    ))
                }
            </Container>
        </StandardLayout>
    );
}
