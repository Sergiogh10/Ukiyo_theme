import { Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface CardProps {
  children: React.ReactNode;
  style?: React.CSSProperties;
}

export const Card = ({ children, style }: CardProps) => {
  return (
    <Section style={{ ...cardStyle, ...style }}>
      {children}
    </Section>
  );
};

const cardStyle = {
  backgroundColor: theme.colors.white,
  padding: '32px',
  borderRadius: theme.radius.md,
  border: `1px solid ${theme.colors.border}`,
  boxShadow: '0 2px 8px rgba(0, 0, 0, 0.02)',
  margin: '24px 0',
};

export default Card;
