import { Badge } from "@/components/ui/badge";
import { Card, CardContent } from "@/components/ui/card";
import { Bookmark, ChevronRight, Clock } from "lucide-react";
import React from "react";

export default function RecipeListSection() {
  // Recipe data for New Recipes section
  const newRecipes = [
    {
      id: 1,
      title: "Nasi Goreng",
      category: "Breakfast",
      description:
        "Nasi lezat yang digoreng dengan bumbu khas, menghasilkan cita rasa gurih dan aromatik",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/image-1.png",
      bookmarked: false,
    },
    {
      id: 2,
      title: "Nasi Kuning",
      category: "Lunch",
      description:
        "Nasi kuning dengan rasa gurih dan warna kuning dari kunyit, disajikan dengan aneka lauk",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/nasi-kuning.png",
      bookmarked: false,
    },
    {
      id: 3,
      title: "Gulai Telur",
      category: "Dinner",
      description:
        "Gulai telur adalah hidangan berkuah santan dengan telur rebus dan bumbu rempah yang kaya rasa.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/gulai-telur.png",
      bookmarked: false,
    },
    {
      id: 4,
      title: "Jemblem",
      category: "Snack",
      description:
        "Jemblem adalah jajanan singkong dengan isian gula merah yang digoreng renyah.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/jemblem.png",
      bookmarked: false,
    },
  ];

  // Recipe data for Best Recipes section
  const bestRecipes = [
    {
      id: 1,
      title: "Sop Iga",
      category: "Lunch",
      description:
        "Sop iga adalah hidangan berkuah gurih dengan iga sapi yang dimasak dengan rempah.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/sop-iga.png",
      bookmarked: false,
    },
    {
      id: 2,
      title: "Bubur Ayam",
      category: "Breakfast",
      description:
        "Bubur ayam adalah hidangan dengan topping ayam suwir, kerupuk, dan kuah kaldu yang gurih.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/bubur-ayam.png",
      bookmarked: false,
    },
    {
      id: 3,
      title: "Steak",
      category: "Dinner",
      description:
        "Steak adalah daging panggang atau goreng dengan saus dan pelengkap.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/steak.png",
      bookmarked: false,
    },
    {
      id: 4,
      title: "Klepon",
      category: "Dessert",
      description:
        "Klepon adalah bola ketan isi gula merah cair berlapis kelapa parut.",
      author: "Naufal",
      rating: 3.5,
      time: "20min",
      image: "/klepon.png",
      bookmarked: false,
    },
  ];

  // Data for New Tips section
  const newTips = [
    {
      id: 1,
      title: "Kupas tomat lebih mudah",
      description:
        "Rendam tomat dalam air panas sejenak agar kulitnya gampang dikupas.",
      author: "Naufal",
      rating: 3.5,
      image: "/kupas-tomat.png",
      bookmarked: false,
    },
    {
      id: 2,
      title: "Talenan Bebas Bau dan Bakteri",
      description: "Gosok dengan garam dan lemon agar bersih maksimal.",
      author: "Naufal",
      rating: 3.5,
      image: "/bersihkan-telenan.png",
      bookmarked: false,
    },
    {
      id: 3,
      title: "Potongan Kue Lebih Rapi",
      description:
        "Panaskan pisau sebelum memotong agar hasilnya bersih dan tidak berantakan.",
      author: "Naufal",
      rating: 3.5,
      image: "/pootng-kue.png",
      bookmarked: false,
    },
  ];

  // Data for Good Tips section
  const goodTips = [
    {
      id: 1,
      title: "Cegah Panci Meluap",
      description:
        "Letakkan sendok kayu di atas panci agar air atau kuah tidak meluber.",
      author: "Naufal",
      rating: 3.5,
      image: "/sendok-kayu-di-atas-panci.png",
      bookmarked: false,
    },
    {
      id: 2,
      title: "Mentega Lebih Mudah Diparut",
      description: "Simpan di freezer agar bisa langsung diparut ke adonan.",
      author: "Naufal",
      rating: 3.5,
      image: "/simpan-mentega.png",
      bookmarked: false,
    },
    {
      id: 3,
      title: "Kentang Goreng Lebih Renyah",
      description:
        "Rendam dalam air sebelum digoreng untuk menghilangkan pati berlebih.",
      author: "Naufal",
      rating: 3.5,
      image: "/rendam-kentang.png",
      bookmarked: false,
    },
    {
      id: 4,
      title: "Cabut Tangkai Stroberi Dengan Mudah",
      description:
        "Gunakan sedotan untuk mengangkat tangkai tanpa merusak buah.",
      author: "Naufal",
      rating: 3.5,
      image: "/cabut-tangkai-stroberi.png",
      bookmarked: false,
    },
  ];

  // Recipe Card Component
  const RecipeCard = ({ item, isRecipe = true }) => (
    <Card className="w-[304px] h-[358px] rounded-[20px] shadow-[0px_4px_10px_2px_#00000040] overflow-hidden">
      <div className="relative h-[203px] bg-[#979797]">
        <img
          src={item.image}
          alt={item.title}
          className="w-full h-full object-cover"
        />
        <div className="absolute bottom-2 right-2 w-[30px] h-[30px]">
          <Bookmark className="w-full h-full" />
        </div>
      </div>
      <CardContent className="p-0 bg-[#ededed] h-[155px] rounded-b-[20px]">
        <div className="p-3">
          {isRecipe && (
            <>
              <Badge className="bg-orange text-xl font-normal rounded px-0 py-0 h-auto">
                {item.category}
              </Badge>

              <div className="absolute top-[204px] right-[30px] flex items-center gap-[5px] p-[5px]">
                <Clock className="w-[25px] h-[25px]" />
                <span className="text-sm font-normal">{item.time}</span>
              </div>
            </>
          )}

          <h3 className="text-2xl font-normal text-black mt-1">{item.title}</h3>

          <p className="text-base font-normal text-black mt-2 w-[259px]">
            {item.description}
          </p>

          <div className="flex justify-between items-center mt-2">
            <p className="text-base font-normal">Author: {item.author}</p>
            <div className="flex items-center">
              <span className="text-sm font-normal">{item.rating}</span>
              <div className="w-[25px] h-[25px] ml-1">
                <img src="/star-1.svg" alt="Rating" className="w-full h-full" />
              </div>
            </div>
          </div>
        </div>
      </CardContent>
    </Card>
  );

  // Section Header Component
  const SectionHeader = ({ title }) => (
    <div className="flex items-center gap-2.5 p-2.5">
      <h2 className="font-bold text-2xl">{title}</h2>
      <ChevronRight className="w-10 h-10" />
    </div>
  );

  return (
    <div className="flex flex-col w-full gap-20">
      {/* New Recipes Section */}
      <section className="w-full">
        <SectionHeader title="New Recipes" />
        <div className="flex items-center gap-5 px-[30px] py-0 mt-[50px]">
          {newRecipes.map((recipe) => (
            <RecipeCard key={recipe.id} item={recipe} />
          ))}
        </div>
      </section>

      {/* Best Recipes Section */}
      <section className="w-full">
        <SectionHeader title="Best Recipes" />
        <div className="flex items-center gap-5 px-[30px] py-0 mt-[50px]">
          {bestRecipes.map((recipe) => (
            <RecipeCard key={recipe.id} item={recipe} />
          ))}
        </div>
      </section>

      {/* New Tips Section */}
      <section className="w-full">
        <SectionHeader title="New Tips" />
        <div className="flex items-center gap-5 px-[30px] py-0 mt-[50px]">
          {newTips.map((tip) => (
            <RecipeCard key={tip.id} item={tip} isRecipe={false} />
          ))}
        </div>
      </section>

      {/* Good Tips Section */}
      <section className="w-full">
        <SectionHeader title="Good Tips" />
        <div className="flex items-center gap-5 px-[30px] py-0 mt-[50px]">
          {goodTips.map((tip) => (
            <RecipeCard key={tip.id} item={tip} isRecipe={false} />
          ))}
        </div>
      </section>
    </div>
  );
}
