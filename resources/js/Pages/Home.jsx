import StandardLayout from "@/Layouts/StandardLayout";
import { Head, Link } from "@inertiajs/react";

export default function Home({ auth, laravelVersion, phpVersion }) {
  const handleImageError = () => {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
  };

  return (
    <StandardLayout>
      <Head title="Home" />
      <div>TEST</div>
    </StandardLayout>
  );
}
