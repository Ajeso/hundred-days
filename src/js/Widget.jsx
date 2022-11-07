import React, { useEffect, useState } from "react";
import { LineChart, Line, ResponsiveContainer } from "recharts";

const Widget = () => {
  const [stats, setStats] = useState([]);

  useEffect(() => {
    async function loadStats() {
      const response = await fetch(
        "http://netflix.local/wp-json/wp/v2/hundred_days_stats"
      );
      if (!response.ok) {
        return;
      }

      const stats = await response.json();
      setStats(stats);
    }

    loadStats();
  }, []);

  // Convert stats values to numbers
  const refinedStats = stats.map((stat) => {
    return {
      id: stat.id,
      time: stat.time,
      views: Number(stat.views),
      clicks: Number(stat.clicks),
    };
  });

  return (
    <div className="hundred-days-widget">
      <ResponsiveContainer width="100%" height="100%">
        <LineChart width={300} height={100} data={refinedStats}>
          <Line
            type="monotone"
            dataKey="clicks"
            stroke="#8884d8"
            strokeWidth={2}
          />
        </LineChart>
      </ResponsiveContainer>
    </div>
  );
};

export default Widget;
