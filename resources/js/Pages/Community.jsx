import StandardLayout from "@/Layouts/StandardLayout";
import {
    faCalendar,
    faComments,
    faHeart,
    faPen,
    faUserGroup,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Head, Link } from "@inertiajs/react";
import {
    Avatar,
    Box,
    Card,
    CardActions,
    CardContent,
    CardHeader,
    CardMedia,
    Container,
    Divider,
    Typography,
    Button,
} from "@mui/material";

export default function Community() {
    return (
        <StandardLayout>
            <Head title="Community" />

            <Container>
                <Box className="row">
                    <Box className="col-12">
                        <Box className="card mb-4">
                            <Box className="user-profile-header-banner">
                                <img
                                    src="../../assets/img/pages/profile-banner.png"
                                    alt="Banner image"
                                    className="rounded-top"
                                />
                            </Box>
                            <Box className="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                                <Box className="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                    <img
                                        src="../../assets/img/avatars/14.png"
                                        alt="user image"
                                        className="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                                    />
                                </Box>
                                <Box className="flex-grow-1 mt-3 mt-sm-5">
                                    <Box className="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                        <Box className="user-profile-info">
                                            <Typography
                                                component={"h4"}
                                                sx={{
                                                    fontSize: "1.5em",
                                                    fontWeight: 700,
                                                }}
                                            >
                                                Ontario Tech Community
                                            </Typography>
                                            <ul className="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                                <li className="list-inline-item d-flex gap-1">
                                                    <FontAwesomeIcon
                                                        icon={faCalendar}
                                                    />
                                                    <Typography>
                                                        Created April 2021
                                                    </Typography>
                                                </li>
                                                <li className="list-inline-item d-flex gap-1">
                                                    <FontAwesomeIcon
                                                        icon={faUserGroup}
                                                    />
                                                    <Typography>
                                                        Followers: 1
                                                    </Typography>
                                                </li>
                                            </ul>
                                        </Box>
                                    </Box>
                                </Box>
                            </Box>
                        </Box>
                    </Box>
                </Box>
            </Container>
            <Container>
                {
                    //This is dummy array. Replace it with dynamic data
                    [...Array(10)].map((e, i) => (
                        <Box>
                            <Card
                                key={i}
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
