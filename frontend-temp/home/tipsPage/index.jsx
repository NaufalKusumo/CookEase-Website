import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardFooter } from "@/components/ui/card";
import { Separator } from "@/components/ui/separator";
import {
  Bookmark,
  ChefHat,
  ChevronRight,
  PlusCircle,
  Search,
  Star,
  User,
} from "lucide-react";
import React from "react";

// Data for the kitchen tips articles
const kitchenTips = [
  {
    id: 1,
    title: "Cara Memilih Bahan Segar",
    author: "Mutiara Hasanah",
    authorAvatar: "M",
    rating: 5,
    image: "/fresh-ingredients-1.png",
  },
  {
    id: 2,
    title: "Cara Memilih Bahan Segar",
    author: "Mutiara Hasanah",
    authorAvatar: "M",
    rating: 5,
    image: "/fresh-ingredients-1-2.png",
  },
  {
    id: 3,
    title: "Cara Memilih Bahan Segar",
    author: "Mutiara Hasanah",
    authorAvatar: "M",
    rating: 5,
    image: "/fresh-ingredients-1-3.png",
  },
  {
    id: 4,
    title: "Cara Memilih Bahan Segar",
    author: "Mutiara Hasanah",
    authorAvatar: "M",
    rating: 5,
    image: "/fresh-ingredients-1-4.png",
  },
];

// Navigation links
const navLinks = [
  { name: "Beranda", href: "#", active: false },
  { name: "Resep", href: "#", active: false },
  { name: "Tips Dapur", href: "#", active: true },
];

const TipsDapurPage = () => {
  return (
    <div className="bg-white flex flex-row justify-center w-full">
      <div className="bg-white overflow-hidden w-full max-w-[1440px] relative">
        {/* Header */}
        <header className="flex items-center justify-between p-4">
          {/* Logo */}
          <div className="flex items-center">
            <ChefHat className="w-[70px] h-[70px] text-brown" />
            <span className="font-bold text-brown text-[32px] [font-family:'Outfit-Bold',Helvetica]">
              CookEase
            </span>
          </div>

          {/* Search Bar */}
          <div className="flex items-center gap-2.5 px-[15px] py-[5px] rounded-[30px] border border-solid border-wheat shadow-md">
            <Search className="w-[35px] h-[35px]" />
            <span className="font-bold text-brown text-xl [font-family:'Outfit-Bold',Helvetica]">
              Cari resep favoritmu di sini
            </span>
          </div>

          {/* Navigation */}
          <nav className="flex items-center gap-[50px]">
            {navLinks.map((link) => (
              <a
                key={link.name}
                href={link.href}
                className={`font-bold text-2xl [font-family:'Outfit-Bold',Helvetica] ${
                  link.active ? "text-new" : "text-brown"
                }`}
              >
                {link.name}
              </a>
            ))}
          </nav>

          {/* User and Create Button */}
          <div className="flex items-center gap-5">
            <Avatar className="w-[60px] h-[60px]">
              <AvatarFallback>
                <User className="w-8 h-8" />
              </AvatarFallback>
            </Avatar>

            <Button className="flex items-center gap-2.5 px-2.5 py-[3px] rounded-[15px] border border-solid border-black shadow-md h-auto bg-white text-black hover:bg-gray-100">
              <PlusCircle className="w-10 h-10" />
              <span className="font-bold text-2xl [font-family:'Outfit-Bold',Helvetica]">
                Buat
              </span>
            </Button>
          </div>
        </header>

        {/* Main Content */}
        <main className="flex flex-col items-center gap-[115px] mt-[100px]">
          <div className="flex flex-col w-full max-w-[1321px] items-start gap-[18px]">
            {/* Kitchen Tips Cards */}
            {kitchenTips.map((tip) => (
              <div key={tip.id} className="w-full">
                <Card className="w-full rounded-[20px] overflow-hidden border-none">
                  <CardContent className="p-0">
                    <div className="relative w-full h-[272px] bg-light rounded-t-[20px] p-0">
                      <div className="flex">
                        {/* Thumbnail Image */}
                        <div className="w-[374px] h-[210px] m-[27px] mr-5">
                          <img
                            src={tip.image}
                            alt="Fresh ingredients"
                            className="w-full h-full object-cover"
                          />
                        </div>

                        {/* Content */}
                        <div className="flex flex-col pt-[27px]">
                          <h2 className="font-bold text-black text-[32px] [font-family:'Outfit-Bold',Helvetica]">
                            {tip.title}
                          </h2>

                          {/* Author */}
                          <div className="flex items-center gap-[5px] mt-[30px]">
                            <Avatar className="w-[50px] h-[50px] bg-white">
                              <AvatarFallback>
                                {tip.authorAvatar}
                              </AvatarFallback>
                            </Avatar>
                            <span className="font-light text-black text-2xl [font-family:'Outfit-Light',Helvetica]">
                              {tip.author}
                            </span>
                          </div>

                          {/* Rating */}
                          <div className="flex items-center mt-[50px]">
                            {Array(tip.rating)
                              .fill(0)
                              .map((_, i) => (
                                <Star
                                  key={i}
                                  className="w-[34.49px] h-[33px] text-yellow-400 fill-yellow-400"
                                />
                              ))}
                          </div>
                        </div>

                        {/* Bookmark */}
                        <div className="absolute top-[27px] right-[27px]">
                          <Bookmark className="w-[50px] h-[50px]" />
                        </div>
                      </div>
                    </div>
                  </CardContent>
                  <CardFooter className="w-full h-[70px] bg-[#d9d9d9] rounded-b-[20px] flex justify-center items-center">
                    <Button
                      variant="ghost"
                      className="flex items-center gap-1 h-auto"
                    >
                      <span className="font-light text-black text-2xl [font-family:'Outfit-Light',Helvetica]">
                        Read More
                      </span>
                      <ChevronRight className="w-[30px] h-[30px]" />
                    </Button>
                  </CardFooter>
                </Card>
              </div>
            ))}
          </div>

          {/* Footer */}
          <footer className="w-full h-[291px] bg-black text-white flex flex-col items-center justify-center">
            <h2 className="[font-family:'Inter-ExtraBold',Helvetica] font-extrabold text-[40px]">
              COOK.
            </h2>
            <p className="[font-family:'Inter-ExtraBold',Helvetica] font-extrabold text-2xl text-center max-w-[646px] mt-4">
              From quick and easy meals to gourmet delights, we have something
              for every taste and occasion
            </p>
            <Separator className="w-[725px] bg-white my-6" />
            <div className="flex items-center gap-12">
              {["Beranda", "Resep", "Tips Dapur"].map((item) => (
                <a
                  key={item}
                  href="#"
                  className="[font-family:'Inter-ExtraBold',Helvetica] font-extrabold text-2xl text-center"
                >
                  {item}
                </a>
              ))}
            </div>
          </footer>
        </main>
      </div>
    </div>
  );
};

export default TipsDapurPage;
