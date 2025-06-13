import { Avatar } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Separator } from "@/components/ui/separator";
import {
  Bookmark,
  ChefHat,
  Clock,
  PlusCircle,
  Search,
  Star,
  Users,
} from "lucide-react";
import React from "react";
import { CommentsSection } from "./CommentsSection";
import { IngredientsSection } from "./IngredientsSection";
import { InstructionsSection } from "./InstructionsSection";
import { MainContentSection } from "./MainContentSection";
import { RatingSection } from "./RatingSection";
import { RecipeListSection } from "./RecipeListSection";
import { RecipeTitleSection } from "./RecipeTitleSection";
import { RelatedRecipesSection } from "./RelatedRecipesSection";
import { TipsSection } from "./TipsSection";

export default function ResepDetail() {
  const stars = Array(5).fill(0);

  return (
    <div className="bg-white flex flex-row justify-center w-full">
      <div className="bg-white w-full max-w-[1440px] relative">
        {/* Header */}
        <header className="flex items-center justify-between p-4">
          <div className="flex items-center">
            <div className="w-[219px] h-[70px] flex items-center">
              <ChefHat className="w-[70px] h-[70px] text-brown" />
              <div className="ml-0 [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-[32px]">
                CookEase
              </div>
            </div>
          </div>

          <div className="flex items-center gap-4">
            <div className="relative flex items-center">
              <Input
                className="pl-12 pr-4 py-2 rounded-[30px] border border-solid border-[#efdcab] shadow-[0px_4px_4px_#000000] w-[380px] h-[45px] [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-xl"
                placeholder="Cari resep favoritmu di sini"
              />
              <Search className="absolute left-3 w-[35px] h-[35px] text-brown" />
            </div>

            <nav className="flex items-center gap-[50px] mx-8">
              <Button
                variant="link"
                className="h-auto [font-family:'Outfit-Bold',Helvetica] font-bold text-[#443627] text-2xl"
              >
                Beranda
              </Button>
              <Button
                variant="link"
                className="h-auto [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-2xl"
              >
                Resep
              </Button>
              <Button
                variant="link"
                className="h-auto [font-family:'Outfit-Bold',Helvetica] font-bold text-brown text-2xl"
              >
                Tips Dapur
              </Button>
            </nav>

            <Avatar className="w-[60px] h-[60px]" />

            <Button className="flex items-center gap-2 h-auto rounded-[15px] border border-solid border-black shadow-[0px_4px_4px_#000000] bg-white text-black">
              <PlusCircle className="w-10 h-10" />
              <span className="[font-family:'Outfit-Bold',Helvetica] font-bold text-2xl">
                Request
              </span>
            </Button>
          </div>
        </header>

        {/* Recipe Title Section */}
        <RecipeTitleSection />

        {/* Main Content */}
        <div className="px-[55px]">
          <div className="mt-4">
            <div className="[font-family:'Outfit-Regular',Helvetica] font-normal text-black text-4xl">
              Nasi kuning dengan rasa gurih dan warna kuning dari kunyit,
              disajikan dengan aneka lauk
            </div>
            <Separator className="my-4" />
          </div>

          {/* Recipe Image */}
          <div className="relative">
            <img
              className="w-full h-auto object-cover"
              alt="Top view cooked rice"
              src=""
            />
            <Button
              variant="ghost"
              className="absolute top-4 right-4 w-[75px] h-[75px] p-0"
              aria-label="Bookmark recipe"
            >
              <Bookmark className="w-full h-full" />
            </Button>
          </div>

          {/* Recipe Info */}
          <div className="flex items-center gap-8 mt-8">
            <div className="flex flex-col">
              <div className="[font-family:'Outfit-Thin',Helvetica] font-thin text-black text-[32px]">
                Servings
              </div>
              <div className="flex items-center gap-2.5 p-2.5">
                <Users className="w-10 h-10" />
                <div className="[font-family:'Outfit-Medium',Helvetica] font-medium text-[32px] text-black">
                  40 Porsi
                </div>
              </div>
            </div>

            <Separator orientation="vertical" className="h-[71px]" />

            <div className="flex flex-col">
              <div className="[font-family:'Outfit-Thin',Helvetica] font-thin text-black text-[32px]">
                Prep Time
              </div>
              <div className="flex items-center gap-[5px] px-2.5 py-[5px]">
                <Clock className="w-10 h-10" />
                <div className="[font-family:'Outfit-Medium',Helvetica] font-medium text-black text-[32px]">
                  20min
                </div>
              </div>
            </div>

            <div className="ml-auto">
              <div className="[font-family:'Outfit-Regular',Helvetica] font-normal text-black text-4xl">
                Recipes
              </div>
              <RecipeListSection />
            </div>
          </div>

          {/* Ingredients Section */}
          <div className="mt-8">
            <h2 className="[font-family:'Outfit-Medium',Helvetica] font-medium text-black text-5xl">
              Bahan - Bahan
            </h2>
            <IngredientsSection />
          </div>

          {/* Instructions Section */}
          <div className="mt-8">
            <h2 className="[font-family:'Outfit-Medium',Helvetica] font-medium text-black text-5xl">
              Langkah - Langkah
            </h2>
            <InstructionsSection />
          </div>

          {/* Tips Section */}
          <div className="mt-8 flex">
            <div className="flex-1">
              <MainContentSection />
            </div>
            <div className="w-[400px]">
              <div className="[font-family:'Outfit-Regular',Helvetica] font-normal text-black text-4xl mb-4">
                Tips Dapur
              </div>
              <TipsSection />
            </div>
          </div>

          {/* Rating Section */}
          <div className="mt-8">
            <h2 className="[font-family:'Outfit-Regular',Helvetica] font-normal text-black text-5xl mb-4">
              Seberapa Puas Anda
            </h2>
            <div className="flex items-center gap-[17px] mb-8">
              {stars.map((_, index) => (
                <Star
                  key={index}
                  className="w-[53.91px] h-[51.42px] text-yellow-400"
                  fill={index < 3 ? "currentColor" : "none"}
                />
              ))}
            </div>
            <RatingSection />
          </div>

          {/* Comments Section */}
          <div className="mt-8">
            <h2 className="[font-family:'Outfit-Regular',Helvetica] font-normal text-5xl text-black mb-4">
              1 Komentar
            </h2>
            <CommentsSection />
          </div>

          {/* Related Recipes */}
          <div className="mt-8">
            <RelatedRecipesSection />
          </div>
        </div>
      </div>
    </div>
  );
}
