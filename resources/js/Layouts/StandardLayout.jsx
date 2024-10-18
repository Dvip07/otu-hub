import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";

import {
    AppBar,
    Box,
    CssBaseline,
    Divider,
    Drawer,
    List,
    ListItem,
    ListItemButton,
    ListItemIcon,
    ListItemText,
    Toolbar,
    Typography,
    IconButton,
    Accordion,
    AccordionSummary,
    AccordionDetails,
    Avatar,
    useTheme,
    useMediaQuery,
    Menu,
    MenuItem,
    Button,
    Tooltip,
} from "@mui/material";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
    faBars,
    faChevronDown,
    faEllipsis,
    faHouse,
    faPlus,
} from "@fortawesome/free-solid-svg-icons";

const drawerWidth = 250;

//Tobe remove with dynamic data
const dummyComms = {
    "Ontario Tech": "",
    "Engineering Society": "",
    GDSC: "",
};
const settings = ["Profile", "Account", "Dashboard", "Logout"];
export default function StandardLayout({ header, children }) {
    const user = usePage().props.auth.user;

    const theme = useTheme();

    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);
    const [mobileOpen, setMobileOpen] = useState(false);
    const [isClosing, setIsClosing] = useState(false);
    const [expanded, setExpanded] = useState(true);
    const [anchorElUser, setAnchorElUser] = useState(null);

    let drawerIcons = {
        Home: {
            icon: <FontAwesomeIcon icon={faHouse} color="#FFFFFF" />,
            link: "/",
        },
    };

    let loggedInSettings = {
        Profile: "dashboard",
        "Log out": "logout",
    };

    let loggedOutSettings = {
        "Log in": "login",
        Register: "register",
    };

    const container =
        window !== undefined ? () => window.document.body : undefined;

    const handleExpansion = () => {
        setExpanded((prevExpanded) => !prevExpanded);
    };

    const handleDrawerClose = () => {
        setIsClosing(true);
        setMobileOpen(false);
    };

    const handleDrawerTransitionEnd = () => {
        setIsClosing(false);
    };

    const handleDrawerToggle = () => {
        if (!isClosing) {
            setMobileOpen(!mobileOpen);
        }
    };

    const handleOpenUserMenu = (event) => {
        setAnchorElUser(event.currentTarget);
    };

    const handleCloseUserMenu = () => {
        setAnchorElUser(null);
    };

    const drawer = (
        <div>
            <Toolbar />
            <Divider />
            <List>
                {(Object.keys(drawerIcons) || []).map((text) => (
                    <ListItem key={text} disablePadding>
                        <Link
                            href="/"
                            style={{
                                textDecoration: "none",
                                color: "#FFFFFF",
                            }}
                        >
                            <ListItemButton>
                                <ListItemIcon>
                                    {drawerIcons[text].icon}
                                </ListItemIcon>
                                <ListItemText primary={text} />
                            </ListItemButton>
                        </Link>
                    </ListItem>
                ))}
            </List>
            <Divider
                variant="middle"
                sx={{ bgcolor: "#5B6770", width: "90%" }}
            />
            <Accordion
                defaultExpanded
                disableGutters
                expanded={expanded}
                onChange={handleExpansion}
                sx={{ bgcolor: "#343434", color: "#FFFFFF", boxShadow: "none" }}
            >
                <AccordionSummary
                    expandIcon={
                        <FontAwesomeIcon icon={faChevronDown} color="#E75D2A" />
                    }
                    aria-controls="panel2-content"
                    id="panel2-header"
                >
                    <Typography color="otuorange">Your Communities</Typography>
                </AccordionSummary>
                <AccordionDetails>
                    <List disablePadding>
                        {(Object.keys(dummyComms) || []).map((text) => (
                            <ListItem
                                key={text}
                                sx={{
                                    paddingLeft: 0,
                                }}
                            >
                                <ListItemButton
                                    disableGutters
                                    sx={{
                                        padding: 0,
                                        "&:hover": {
                                            backgroundColor: "transparent",
                                        },
                                    }}
                                >
                                    <ListItemIcon>
                                        <Avatar
                                            alt={text}
                                            src={
                                                dummyComms[text]
                                                    ? dummyComms[text]
                                                    : "/"
                                            }
                                            sx={{ bgcolor: "#E75D2A" }}
                                        />
                                    </ListItemIcon>
                                    <ListItemText primary={text} />
                                </ListItemButton>
                            </ListItem>
                        ))}
                    </List>
                </AccordionDetails>
            </Accordion>
            <Divider
                variant="middle"
                sx={{ bgcolor: "#5B6770", width: "90%" }}
            />
        </div>
    );

    return (
        <Box
            className="min-h-screen"
            sx={{ display: "flex", bgcolor: "#343434" }}
        >
            <CssBaseline />
            <AppBar
                position="fixed"
                color="appbar"
                sx={{
                    zIndex: (theme) => theme.zIndex.drawer + 1,
                }}
            >
                <Toolbar>
                    <Box sx={{ flexGrow: 1, display: "flex" }}>
                        {useMediaQuery(theme.breakpoints.down("sm")) && (
                            <IconButton
                                color="inherit"
                                aria-label="open drawer"
                                edge="start"
                                onClick={handleDrawerToggle}
                                sx={{ mr: 2, display: { sm: "none" } }}
                            >
                                <FontAwesomeIcon
                                    icon={faBars}
                                    color="#FFFFFF"
                                />
                            </IconButton>
                        )}

                        <Box sx={{ maxWidth: "5em", display: "flex" }}>
                            <Link href="/">
                                <img src="storage/AppLogo.png" alt="OTUHub" />
                            </Link>
                        </Box>
                    </Box>

                    {user?.id ? (
                        <Box sx={{ flexGrow: 0 }}>
                            <Link href={route("createPost")}>
                                <Button
                                    sx={{
                                        bgcolor: "#003C71",
                                        paddingX: "1em",
                                        paddingY: "0.5em",
                                        color: "#FFFFFF",
                                        borderRadius: 50,
                                        mr: 2,
                                    }}
                                    startIcon={
                                        <FontAwesomeIcon
                                            icon={faPlus}
                                            color="#FFFFFF"
                                        />
                                    }
                                >
                                    Create
                                </Button>
                            </Link>
                            <Tooltip title="Open settings">
                                <IconButton
                                    onClick={handleOpenUserMenu}
                                    sx={{ p: 0 }}
                                >
                                    <Avatar
                                        sx={{
                                            bgcolor: "#E75D2A",
                                        }}
                                        alt={user.name}
                                        src="/static/images/avatar/2.jpg"
                                    />
                                </IconButton>
                            </Tooltip>
                            <Menu
                                sx={{ mt: "45px" }}
                                id="menu-appbar"
                                anchorEl={anchorElUser}
                                anchorOrigin={{
                                    vertical: "top",
                                    horizontal: "right",
                                }}
                                keepMounted
                                transformOrigin={{
                                    vertical: "top",
                                    horizontal: "right",
                                }}
                                open={Boolean(anchorElUser)}
                                onClose={handleCloseUserMenu}
                            >
                                {(Object.keys(loggedInSettings) || []).map(
                                    (setting) => (
                                        <Link
                                            key={setting}
                                            style={{
                                                textDecoration: "none",
                                                color: "#003C71",
                                            }}
                                            href={route(
                                                loggedInSettings[setting]
                                            )}
                                            method={
                                                setting == "Log out"
                                                    ? "post"
                                                    : "get"
                                            }
                                        >
                                            <MenuItem
                                                onClick={handleCloseUserMenu}
                                            >
                                                <Typography
                                                    sx={{
                                                        textAlign: "center",
                                                    }}
                                                >
                                                    {setting}
                                                </Typography>
                                            </MenuItem>
                                        </Link>
                                    )
                                )}
                            </Menu>
                        </Box>
                    ) : (
                        <Box
                            sx={{
                                display: "flex",
                                alignItems: "center",
                                mr: 2,
                            }}
                        >
                            <Link href={route("login")}>
                                <Button
                                    sx={{
                                        bgcolor: "#E75D2A",
                                        paddingX: "1em",
                                        paddingY: "0.5em",
                                        color: "#FFFFFF",
                                        borderRadius: 50,
                                    }}
                                >
                                    Log in
                                </Button>
                            </Link>
                            <Box sx={{ flexGrow: 0 }}>
                                <Tooltip title="Open settings">
                                    <IconButton
                                        onClick={handleOpenUserMenu}
                                        sx={{ p: 0, ml: 2 }}
                                    >
                                        <FontAwesomeIcon
                                            icon={faEllipsis}
                                            color="#FFFFFF"
                                        />
                                    </IconButton>
                                </Tooltip>
                                <Menu
                                    sx={{ mt: "45px" }}
                                    id="menu-appbar"
                                    anchorEl={anchorElUser}
                                    anchorOrigin={{
                                        vertical: "top",
                                        horizontal: "right",
                                    }}
                                    keepMounted
                                    transformOrigin={{
                                        vertical: "top",
                                        horizontal: "right",
                                    }}
                                    open={Boolean(anchorElUser)}
                                    onClose={handleCloseUserMenu}
                                >
                                    {(Object.keys(loggedOutSettings) || []).map(
                                        (setting) => (
                                            <Link
                                                key={setting}
                                                href={route(
                                                    loggedOutSettings[setting]
                                                )}
                                                method={
                                                    setting == "Log out"
                                                        ? "post"
                                                        : "get"
                                                }
                                            >
                                                <MenuItem
                                                    onClick={
                                                        handleCloseUserMenu
                                                    }
                                                >
                                                    <Typography
                                                        sx={{
                                                            textAlign: "center",
                                                            color: "#003C71",
                                                        }}
                                                    >
                                                        {setting}
                                                    </Typography>
                                                </MenuItem>
                                            </Link>
                                        )
                                    )}
                                </Menu>
                            </Box>
                        </Box>
                    )}
                </Toolbar>
            </AppBar>
            <Box
                component="nav"
                sx={{ width: { sm: drawerWidth }, flexShrink: { sm: 0 } }}
                aria-label="mailbox folders"
            >
                {/* The implementation can be swapped with js to avoid SEO duplication of links. */}
                {useMediaQuery(theme.breakpoints.down("sm")) ? (
                    <Drawer
                        container={container}
                        variant="temporary"
                        open={mobileOpen}
                        onTransitionEnd={handleDrawerTransitionEnd}
                        onClose={handleDrawerClose}
                        ModalProps={{
                            keepMounted: true, // Better open performance on mobile.
                        }}
                        sx={{
                            display: { xs: "block", sm: "none" },
                            "& .MuiDrawer-paper": {
                                boxSizing: "border-box",
                                width: drawerWidth,
                                bgcolor: "#343434",
                                color: "#FFFFFF",
                            },
                        }}
                    >
                        {drawer}
                    </Drawer>
                ) : (
                    <Drawer
                        variant="permanent"
                        sx={{
                            display: { xs: "none", sm: "block" },
                            "& .MuiDrawer-paper": {
                                boxSizing: "border-box",
                                width: drawerWidth,
                                bgcolor: "#343434",
                                color: "#FFFFFF",
                                borderColor: "#5B6770",
                            },
                        }}
                        open
                    >
                        {drawer}
                    </Drawer>
                )}
            </Box>
            <Box
                component="main"
                sx={{
                    flexGrow: 1,
                    p: 3,
                    width: { sm: `calc(100% - ${drawerWidth}px)` },
                }}
            >
                <Toolbar />
                {children}
            </Box>
        </Box>
    );
}
