import { Text, Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface HighlightQuoteProps {
  children: React.ReactNode;
}

export const HighlightQuote = ({ children }: HighlightQuoteProps) => {
  return (
    <Section style={containerStyle}>
      <Text style={textStyle}>
        "{children}"
      </Text>
    </Section>
  );
};

const containerStyle = {
  borderLeft: `4px solid ${theme.colors.accent}`,
  paddingLeft: '20px',
  margin: '24px 0',
};

const textStyle = {
  margin: '0',
  fontSize: '18px',
  lineHeight: '28px',
  fontStyle: 'italic',
  color: theme.colors.primaryDark,
  fontFamily: theme.fonts.serif,
};

export default HighlightQuote;
