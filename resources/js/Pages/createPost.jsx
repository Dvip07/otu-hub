import StandardLayout from "@/Layouts/StandardLayout";
import { useEffect, useState } from "react";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    Autocomplete,
    Avatar,
    Box,
    Button,
    Container,
    Typography,
} from "@mui/material";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import InputError from "@/Components/InputError";
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import { Inertia } from '@inertiajs/inertia';

export default function createPost({ auth, laravelVersion, phpVersion }) {
    const dummyComms = [
        { src: "/", label: "Ontario Tech" },
        { src: "/", label: "Engineering Society" },
        { src: "/", label: "GDSC" },
    ];

    const { data, setData, post, processing, errors, reset } = useForm({
        community: "",
        postTitle: "",
        postDescription: "",
        uploadMedia: null,
        link: "",
    });

    useEffect(() => {
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);

        const pond = FilePond.create(document.querySelector(".fileUpload"));
        pond.setOptions({
            allowFileTypeValidation: true,
            allowFileSizeValidation: true,
            maxFileSize: "25MB",
            acceptedFileTypes: [
                "image/png",
                "image/jpeg",
                "image/jpg",
                "image/gif",
            ],
            onaddfile: (error, file) => {
                if (!error) {
                    setData("uploadMedia", file);
                }
            },
        });
    }, []);

    // const submit = (e) => {
    //     // e.preventDefault();
    //     // post(route('login'), {
    //     //     onFinish: () => reset('password'),
    //     // });
    // };

    const submit = (e) => {
        e.preventDefault();

        // Create FormData to handle file uploads
        const formData = new FormData();
        formData.append('community', data.community);
        formData.append('postTitle', data.postTitle);
        formData.append('postDescription', data.postDescription);
        formData.append('link', data.link);
        
        // If a file is selected, append it to the FormData
        if (data.fileUpload) {
            formData.append('fileUpload', data.fileUpload);
        }

        // Use Inertia to post the form data to the server
        Inertia.post(route('posts.store'), formData, {
            forceFormData: true, // Ensures file uploads are handled correctly
            onError: (err) => {
                // Handle validation errors from the server
                setErrors(err);
            },
            onSuccess: () => {
                // Clear the form upon successful submission
                setData({
                    community: '',
                    postTitle: '',
                    postDescription: '',
                    link: '',
                    fileUpload: null,
                });
            },
        });
    };

    return (
        <StandardLayout>
            <Head title="createPost" />
            <Container className="content-wrapper">
                {/* <!-- Header --> */}
                <Box className="row justify-content-center">
                    <Box>
                        <Box
                            className="card mb-2 p-3"
                            sx={{
                                bgcolor: "#343434",
                                color: "#FFFFFF",
                                border: "none",
                            }}
                        >
                            <Typography
                                component={"h5"}
                                className="card-header"
                                sx={{
                                    fontSize: "1.5rem",
                                    bgcolor: "#343434",
                                    border: "none",
                                    color: "#E75D2A",
                                    fontWeight: "700",
                                }}
                            >
                                Create a Post
                            </Typography>
                            <Box className="card-body">
                                <form onSubmit={submit}>
                                    <Box className="mb-3">
                                        <InputLabel
                                            htmlFor="community"
                                            value="Select a Community"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />
                                        <Autocomplete
                                            id="selectCommunity"
                                            sx={(theme) => ({
                                                display: "inline-block",
                                                "& input": { 
                                                    width: 300,
                                                    bgcolor: "#FFFFFF",
                                                    color: "#000000",
                                                },
                                            })}
                                            options={dummyComms}
                                            autoHighlight
                                            getOptionLabel={(option) =>
                                                option.label
                                            }
                                            // value={data.community ? data.community : {label: "Select a community"}}
                                            onChange={(e) =>
                                                setData(
                                                    "community",
                                                    e.target.value
                                                )
                                            }
                                            renderOption={(props, option) => {
                                                const { key, ...optionProps } =
                                                    props;
                                                return (
                                                    <Box
                                                        key={key}
                                                        component="li"
                                                        {...optionProps}
                                                    >
                                                        <Avatar
                                                            alt={option.label}
                                                            src={
                                                                option.src
                                                                    ? option.src
                                                                    : "/"
                                                            }
                                                            sx={{
                                                                bgcolor:
                                                                    "#E75D2A",
                                                                mr: "1em",
                                                            }}
                                                        />
                                                        <Typography>
                                                            {option.label}
                                                        </Typography>
                                                    </Box>
                                                );
                                            }}
                                            renderInput={(params) => (
                                                <div
                                                    ref={params.InputProps.ref}
                                                >
                                                    <input
                                                        {...params.inputProps}
                                                        type="text"
                                                        placeholder="Search communities..."
                                                        className={
                                                            "rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                        }
                                                    />
                                                </div>
                                            )}
                                        />

                                        <InputError
                                            message={errors.community}
                                            className="mt-2"
                                        />
                                    </Box>

                                    {/* <!-- Post Title --> */}
                                    <Box className="mb-3">
                                        <InputLabel
                                            htmlFor="postTitle"
                                            value="Post Title"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <TextInput
                                            id="postTitle"
                                            type="text"
                                            name="postTitle"
                                            value={data.postTitle}
                                            className="mt-1 block w-full"
                                            style={{
                                                color:"#000000"
                                            }}
                                            placeholder="What's on your mind?"
                                            isFocused={true}
                                            onChange={(e) =>
                                                setData(
                                                    "postTitle",
                                                    e.target.value
                                                )
                                            }
                                        />

                                        <InputError
                                            message={errors.postTitle}
                                            className="mt-2"
                                        />
                                    </Box>

                                    {/* <!-- Post Description --> */}
                                    <div className="mb-3">
                                        <InputLabel
                                            htmlFor="postDescription"
                                            value="Post Description"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <textarea
                                            id="postDescription"
                                            className="form-control"
                                            rows="4"
                                            maxLength="255"
                                            placeholder="Share your thoughts..."
                                            value={data.postDescription}
                                            onChange={(e) =>
                                                setData(
                                                    "postDescription",
                                                    e.target.value
                                                )
                                            }
                                        ></textarea>

                                        <InputError
                                            message={errors.postDescription}
                                            className="mt-2"
                                        />

                                        <small
                                            style={{
                                                color: "#E75D2A",
                                            }}
                                        >
                                            Max 255 characters.
                                        </small>
                                    </div>

                                    {/* <!-- File Upload --> */}
                                    <div className="mb-3">
                                        <InputLabel
                                            htmlFor="fileUpload"
                                            value="Upload Media"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <input
                                            type="file"
                                            className="fileUpload"
                                        />

                                        <small
                                            style={{
                                                color: "#E75D2A",
                                            }}
                                        >
                                            Supported formats: jpg, png, gif.
                                        </small>
                                    </div>

                                    {/* <!-- URL Links --> */}
                                    <div className="mb-3">
                                        <InputLabel
                                            htmlFor="linkInput"
                                            value="Add Links"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <div className="input-group">
                                            <span
                                                className="input-group-text"
                                                id="basic-addon14"
                                            >
                                                https://example.com/
                                            </span>
                                            <input
                                                type="text"
                                                className="form-control"
                                                id="linkInput"
                                                placeholder="Add URL"
                                                aria-describedby="basic-addon14"
                                                value={data.link}
                                                onChange={(e) =>
                                                    setData(
                                                        "link",
                                                        e.target.value
                                                    )
                                                }
                                            />
                                        </div>
                                    </div>

                                    {/* <!-- Submit Button --> */}
                                    <div className="mt-3 d-flex justify-content-between">
                                        
                                        <Button
                                            type="submit"
                                            sx={{
                                                bgcolor: "#0077CA",
                                                color: "#FFFFFF"
                                            }}
                                        >
                                            Post
                                        </Button>
                                    </div>
                                </form>
                            </Box>
                        </Box>
                    </Box>
                </Box>
            </Container>
        </StandardLayout>
    );
}
