import { Avatar } from "@/components/ui/avatar";
import { AvatarImage } from "@/components/ui/avatar";
import { AvatarFallback } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import { Card } from "@/components/ui/card";
import { CardContent } from "@/components/ui/card";
import { ChevronDown, ThumbsUp } from "lucide-react";
import React from "react";

export default function RecipeListSection() {
  // Data for the recipe comment
  const commentData = {
    user: {
      name: "Naufal Kusumo",
      avatar: "", // Placeholder for avatar image
      timeAgo: "2 hari yang lalu",
    },
    comment: {
      title: "Cocok buat arisan",
      likes: 120,
      replies: 5,
    },
  };

  return (
    <Card className="flex items-start gap-[7px] border-none shadow-none w-full">
      <Avatar className="w-20 h-20">
        <AvatarImage
          src={commentData.user.avatar}
          alt={commentData.user.name}
        />
        <AvatarFallback>NK</AvatarFallback>
      </Avatar>

      <CardContent className="flex flex-col w-full items-start gap-2.5 p-0">
        <div className="flex items-center gap-2">
          <span className="font-normal text-2xl">{commentData.user.name}</span>
          <span className="font-extralight text-base">
            {commentData.user.timeAgo}
          </span>
        </div>

        <h3 className="font-normal text-[32px] leading-normal">
          {commentData.comment.title}
        </h3>

        <div className="flex items-center gap-[35px]">
          <div className="flex items-center gap-4">
            <div className="flex items-center gap-2.5">
              <ThumbsUp className="w-10 h-10" />
              <span className="font-normal text-2xl">
                {commentData.comment.likes}
              </span>
            </div>
            <div className="w-5">
              <ThumbsUp className="w-10 h-10 -mr-5" />
            </div>
          </div>

          <Button variant="ghost" className="font-normal text-2xl h-auto p-0">
            Balas
          </Button>
        </div>

        <Button
          variant="ghost"
          className="flex items-center gap-2.5 py-2.5 px-0 h-auto"
        >
          <ChevronDown className="w-10 h-10" />
          <span className="font-normal text-2xl">
            {commentData.comment.replies} balasan
          </span>
        </Button>
      </CardContent>
    </Card>
  );
}
