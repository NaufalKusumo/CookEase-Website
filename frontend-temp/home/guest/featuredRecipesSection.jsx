import { Badge } from "@/components/ui/badge";
import { Card, CardContent } from "@/components/ui/card";
import { Bookmark, ChevronRight, Clock } from "lucide-react";
import React from "react";

// Recipe data for New Recipes section
const newRecipes = [
  {
    id: 1,
    title: "Sop Iga",
    category: "Lunch",
    description:
      "Sop iga adalah hidangan berkuah gurih dengan iga sapi yang dimasak dengan rempah.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/sop-iga.png",
  },
  {
    id: 2,
    title: "Bubur Ayam",
    category: "Breakfast",
    description:
      "Bubur ayam adalah hidangan dengan topping ayam suwir, kerupuk, dan kuah kaldu yang gurih.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/bubur-ayam.png",
  },
  {
    id: 3,
    title: "Steak",
    category: "Dinner",
    description:
      "Steak adalah daging panggang atau goreng dengan saus dan pelengkap.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/steak.png",
  },
  {
    id: 4,
    title: "Klepon",
    category: "Dessert",
    description:
      "Klepon adalah bola ketan isi gula merah cair berlapis kelapa parut.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/klepon.png",
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
    time: "20min",
    rating: "3.5",
    image: "/sop-iga.png",
  },
  {
    id: 2,
    title: "Bubur Ayam",
    category: "Breakfast",
    description:
      "Bubur ayam adalah hidangan dengan topping ayam suwir, kerupuk, dan kuah kaldu yang gurih.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/bubur-ayam.png",
  },
  {
    id: 3,
    title: "Steak",
    category: "Dinner",
    description:
      "Steak adalah daging panggang atau goreng dengan saus dan pelengkap.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/steak.png",
  },
  {
    id: 4,
    title: "Klepon",
    category: "Dessert",
    description:
      "Klepon adalah bola ketan isi gula merah cair berlapis kelapa parut.",
    author: "Naufal",
    time: "20min",
    rating: "3.5",
    image: "/klepon.png",
  },
];

// Tips data for New Tips section
const newTips = [
  {
    id: 1,
    title: "Kupas tomat lebih mudah",
    description:
      "Rendam tomat dalam air panas sejenak agar kulitnya gampang dikupas.",
    author: "Naufal",
    rating: "3.5",
    image: "/kupas-tomat.png",
  },
  {
    id: 2,
    title: "Talenan Bebas Bau dan Bakteri",
    description: "Gosok dengan garam dan lemon agar bersih maksimal.",
    author: "Naufal",
    rating: "3.5",
    image: "/bersihkan-telenan.png",
  },
  {
    id: 3,
    title: "Potongan Kue Lebih Rapi",
    description:
      "Panaskan pisau sebelum memotong agar hasilnya bersih dan tidak berantakan.",
    author: "Naufal",
    rating: "3.5",
    image: "/pootng-kue.png",
  },
];

// Tips data for Good Tips section
const goodTips = [
  {
    id: 1,
    title: "Cegah Panci Meluap",
    description:
      "Letakkan sendok kayu di atas panci agar air atau kuah tidak meluber.",
    author: "Naufal",
    rating: "3.5",
    image: "/sendok-kayu-di-atas-panci.png",
  },
  {
    id: 2,
    title: "Mentega Lebih Mudah Diparut",
    description: "Simpan di freezer agar bisa langsung diparut ke adonan.",
    author: "Naufal",
    rating: "3.5",
    image: "/simpan-mentega.png",
  },
  {
    id: 3,
    title: "Kentang Goreng Lebih Renyah",
    description:
      "Rendam dalam air sebelum digoreng untuk menghilangkan pati berlebih.",
    author: "Naufal",
    rating: "3.5",
    image: "/rendam-kentang.png",
  },
  {
    id: 4,
    title: "Cabut Tangkai Stroberi Dengan Mudah",
    description: "Gunakan sedotan untuk mengangkat tangkai tanpa merusak buah.",
    author: "Naufal",
    rating: "3.5",
    image: "/cabut-tangkai-stroberi.png",
  },
];

// Recipe Card Component
const RecipeCard = ({ recipe }) => {
  return (
    <Card className="w-[304px] h-[358px] rounded-[20px] shadow-[0px_4px_10px_2px_#00000040] overflow-hidden">
      <div
        className="w-full h-[203px] bg-cover bg-center relative"
        style={{ backgroundImage: `url(${recipe.image})` }}
      >
        <div className="absolute bottom-2 right-2">
          <Bookmark className="w-[30px] h-[30px]" />
        </div>
      </div>
      <CardContent className="p-0">
        <div className="bg-[#ededed] h-[155px] rounded-b-[20px] p-3">
          <div className="flex justify-between items-start">
            <div>
              <Badge className="bg-transparent text-orange border-none p-0 text-xl font-normal">
                {recipe.category}
              </Badge>
              <h3 className="text-2xl font-normal mt-1">{recipe.title}</h3>
            </div>
            {recipe.time && (
              <div className="flex items-center gap-1 mt-1">
                <Clock className="w-[25px] h-[25px]" />
                <span className="text-sm">{recipe.time}</span>
              </div>
            )}
          </div>
          <p className="text-base mt-3 line-clamp-2">{recipe.description}</p>
          <div className="flex justify-between items-center mt-3">
            <p className="text-base">Author: {recipe.author}</p>
            <div className="flex items-center gap-1">
              <span className="text-sm">{recipe.rating}</span>
              <span className="text-yellow-500">★</span>
            </div>
          </div>
        </div>
      </CardContent>
    </Card>
  );
};

// Tip Card Component
const TipCard = ({ tip }) => {
  return (
    <Card className="w-[304px] h-[358px] rounded-[20px] shadow-[0px_4px_10px_2px_#00000040] overflow-hidden">
      <div
        className="w-full h-[203px] bg-cover bg-center relative"
        style={{ backgroundImage: `url(${tip.image})` }}
      >
        <div className="absolute bottom-2 right-2">
          <Bookmark className="w-[30px] h-[30px]" />
        </div>
      </div>
      <CardContent className="p-0">
        <div className="bg-[#ededed] h-[155px] rounded-b-[20px] p-3">
          <h3 className="text-2xl font-normal">{tip.title}</h3>
          <p className="text-base mt-3 line-clamp-2">{tip.description}</p>
          <div className="flex justify-between items-center mt-3">
            <p className="text-base">Author: {tip.author}</p>
            <div className="flex items-center gap-1">
              <span className="text-sm">{tip.rating}</span>
              <span className="text-yellow-500">★</span>
            </div>
          </div>
        </div>
      </CardContent>
    </Card>
  );
};

// Section Header Component
const SectionHeader = ({ title, icon }) => {
  return (
    <div className="flex items-center gap-2.5 p-2.5 mb-10">
      <h2 className="font-bold text-2xl">{title}</h2>
      <ChevronRight className="w-10 h-10" />
    </div>
  );
};

export default function FeaturedRecipesSection() {
  return (
    <section className="flex flex-col w-full gap-20 py-10">
      {/* New Recipes Section */}
      <div className="relative w-full">
        <SectionHeader title="New Recipes" />
        <div className="flex items-center gap-5 px-[30px]">
          {newRecipes.map((recipe) => (
            <RecipeCard key={recipe.id} recipe={recipe} />
          ))}
        </div>
      </div>

      {/* Best Recipes Section */}
      <div className="relative w-full">
        <SectionHeader title="Best Recipes" />
        <div className="flex items-center gap-5 px-[30px]">
          {bestRecipes.map((recipe) => (
            <RecipeCard key={recipe.id} recipe={recipe} />
          ))}
        </div>
      </div>

      {/* New Tips Section */}
      <div className="relative w-full">
        <SectionHeader title="New Tips" />
        <div className="flex items-center gap-5 px-[30px]">
          {newTips.map((tip) => (
            <TipCard key={tip.id} tip={tip} />
          ))}
          <div className="flex justify-center items-center">
            <img src="" alt="Group of tips" className="w-[377px] h-[452px]" />
          </div>
        </div>
      </div>

      {/* Good Tips Section */}
      <div className="relative w-full">
        <SectionHeader title="Good Tips" />
        <div className="flex items-center gap-5 px-[30px]">
          {goodTips.map((tip) => (
            <TipCard key={tip.id} tip={tip} />
          ))}
        </div>
      </div>
    </section>
  );
}
