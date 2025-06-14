import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Card, CardContent } from "@/components/ui/card";
import { Star } from "lucide-react";
import React from "react";

export default function IngredientsSection() {
  // Recipe card data
  const recipeCards = [
    {
      id: 1,
      image: "", // Placeholder for image14
      title: "Nasi Goreng",
      author: {
        name: "Naufal Kusumo",
        avatar: "", // Placeholder for person5
      },
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
    },
    {
      id: 2,
      image: "", // Placeholder for image15
      title: "Nasi Goreng",
      author: {
        name: "Naufal Kusumo",
        avatar: "", // Placeholder for person6
      },
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
    },
    {
      id: 3,
      image: "", // Placeholder for image16
      title: "Nasi Goreng",
      author: {
        name: "Naufal Kusumo",
        avatar: "", // Placeholder for person7
      },
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
    },
    {
      id: 4,
      image: "", // Placeholder for image17
      title: "Nasi Goreng",
      author: {
        name: "Naufal Kusumo",
        avatar: "", // Placeholder for person8
      },
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
    },
    {
      id: 5,
      image: "", // Placeholder for image18
      title: "Nasi Goreng",
      author: {
        name: "Naufal Kusumo",
        avatar: "", // Placeholder for person9
      },
      rating: 3.5,
      reviews: 27,
      timeAgo: "2 hari yang lalu",
    },
  ];

  return (
    <div className="flex flex-col w-full items-start gap-5">
      {recipeCards.map((recipe) => (
        <Card
          key={recipe.id}
          className="flex items-center gap-[9px] w-full border-none shadow-none"
        >
          <CardContent className="flex items-center gap-[9px] p-0 w-full">
            <img
              className="w-[189px] h-[126px] object-cover"
              alt="Nasi Goreng"
              src={recipe.image}
            />

            <div className="flex flex-col w-[177px] items-start gap-[29px]">
              <div className="flex flex-col items-start w-full">
                <h3 className="w-full [font-family:'Outfit-Regular',Helvetica] font-normal text-[32px] text-black tracking-[0] leading-normal mt-[-1px]">
                  {recipe.title}
                </h3>

                <div className="inline-flex h-8 items-center gap-[5px]">
                  <Avatar className="w-[25px] h-[25px]">
                    <AvatarImage src={recipe.author.avatar} alt="Author" />
                    <AvatarFallback>NK</AvatarFallback>
                  </Avatar>

                  <span className="[font-family:'Outfit-ExtraLight',Helvetica] font-extralight text-black text-sm tracking-[0] leading-normal">
                    {recipe.author.name}
                  </span>
                </div>
              </div>

              <div className="flex items-center gap-3 w-full">
                <div className="inline-flex items-center gap-0.5">
                  <Star className="w-5 h-5 text-yellow-500 fill-yellow-500" />
                  <span className="text-sm [font-family:'Outfit-Regular',Helvetica] font-normal text-black tracking-[0] leading-normal">
                    {recipe.rating}
                  </span>
                  <span className="text-sm [font-family:'Outfit-Regular',Helvetica] font-normal text-black tracking-[0] leading-normal">
                    ({recipe.reviews})
                  </span>
                </div>

                <span className="[font-family:'Outfit-Light',Helvetica] font-light text-sm text-black tracking-[0] leading-normal">
                  {recipe.timeAgo}
                </span>
              </div>
            </div>
          </CardContent>
        </Card>
      ))}
    </div>
  );
}
