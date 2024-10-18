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

export default function createCommunity({ auth, laravelVersion, phpVersion }) {
    const dummyComms = [
        { src: "/", label: "Ontario Tech" },
        { src: "/", label: "Engineering Society" },
        { src: "/", label: "GDSC" },
    ];

    const { data, setData, post, processing, errors, reset } = useForm({
        communityName: "",
        communityDescription: "",
        fileUploadProfile: null,
        fileUploadBanner: null,
    });

    useEffect(() => {
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);

        const profileUpload = FilePond.create(document.querySelector(".fileUploadProfile"));
        profileUpload.setOptions({
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
                    setData("fileUploadProfile", file);
                }
            },
        });

        const bannerUpload = FilePond.create(document.querySelector(".fileUploadBanner"));
        bannerUpload.setOptions({
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
                    setData("fileUploadBanner", file);
                }
            },
        });
    }, []);

    const submit = (e) => {
        // e.preventDefault();
        // post(route('login'), {
        //     onFinish: () => reset('password'),
        // });
    };
    return (
        <StandardLayout>
            <Head title="createCommunity" />
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
                                Create a Community
                            </Typography>
                            <Box className="card-body">
                                <form onSubmit={submit}>

                                    {/* <!-- Post Title --> */}
                                    <Box className="mb-3">
                                        <InputLabel
                                            htmlFor="communityName"
                                            value="Community Name"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <TextInput
                                            id="communityName"
                                            type="text"
                                            name="communityName"
                                            value={data.communityName}
                                            className="mt-1 block w-full"
                                            style={{
                                                color:"#000000"
                                            }}
                                            placeholder="What's on your mind?"
                                            isFocused={true}
                                            onChange={(e) =>
                                                setData(
                                                    "communityName",
                                                    e.target.value
                                                )
                                            }
                                        />

                                        <InputError
                                            message={errors.communityName}
                                            className="mt-2"
                                        />
                                    </Box>

                                    {/* <!-- Post Description --> */}
                                    <div className="mb-3">
                                        <InputLabel
                                            htmlFor="communityDescription"
                                            value="Community Description"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <textarea
                                            id="communityDescription"
                                            className="form-control"
                                            rows="4"
                                            maxLength="255"
                                            placeholder="Share your thoughts..."
                                            value={data.communityDescription}
                                            onChange={(e) =>
                                                setData(
                                                    "communityDescription",
                                                    e.target.value
                                                )
                                            }
                                        ></textarea>

                                        <InputError
                                            message={errors.communityDescription}
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
                                            htmlFor="fileUploadProfile"
                                            value="Upload Community Profile Image"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <input
                                            type="file"
                                            className="fileUploadProfile"
                                        />

                                        <small
                                            style={{
                                                color: "#E75D2A",
                                            }}
                                        >
                                            Supported formats: jpg, png, gif.
                                        </small>
                                    </div>

                                    <div className="mb-3">
                                        <InputLabel
                                            htmlFor="fileUploadBanner"
                                            value="Upload Community Banner Image"
                                            className="form-label"
                                            style={{
                                                color: "#FFFFFF",
                                            }}
                                        />

                                        <input
                                            type="file"
                                            className="fileUploadBanner"
                                        />

                                        <small
                                            style={{
                                                color: "#E75D2A",
                                            }}
                                        >
                                            Supported formats: jpg, png, gif.
                                        </small>
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
                                            Create
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
